<script type="text/javascript" src="/assets/highcharts/highstock.js"></script>
<script type="text/javascript" src="/assets/highcharts/highcharts-more.js"></script>
<script type="text/javascript" src="/assets/highcharts/modules/solid-gauge.js"></script>

<?php
if ($this->worker->isSSDB)
{
  $maxSize = 1000;
  $info = [];
  $type = 'SSDB磁盘';


  # 得到ssdb占用的硬盘空间
  $rs = $this->worker->ssdb->info();
  end($rs);
  $data = current($rs);
  $size = 0;
  foreach(explode("\n", trim($data)) as $item)
  {
    $arr = preg_split('#[ ]+#', trim($item));
    if (is_numeric($arr[0]) && isset($arr[2]))
    {
      $size += $arr[2];
    }
  }
  $info['used_memory'] = $size * 1024 * 1024;
  unset($data, $rs, $size);
}
else
{
  $maxSize = 16;
  $type = 'Redis内存';
  if ($this->worker->redis instanceof Redis)
  {
    $info = $this->worker->redis->info();
  }
  else
  {
    $info = ['used_memory' => 0];
    foreach (EtServer::$config['redis']['hosts'] as $i => $v)
    {
      $tmp = $this->worker->redis->info($i);
      $info['used_memory'] += $tmp['used_memory'];
    }
  }
}

$allMemory     = [
    MainWorker::$serverName => EtServer::$startUseMemory
];
$allMemoryTotal = $allMemory[MainWorker::$serverName];

$allMemoryData = $this->worker->redis->hGetAll('server.memory');
if ($allMemoryData)foreach ($allMemoryData as $key => $item)
{
  list($mem, $time, $serv, $wid) = unserialize($item);
  if (MainWorker::$timed - $time < 80)
  {
    if ($serv == MainWorker::$serverName)
    {
      $allMemory[$serv] += $mem;
      $allMemoryTotal   += $mem;
    }
  }
  else
  {
    # 清理过期的数据
    $this->worker->redis->hDel('server.memory', $key);
  }
}

$stat = $this->server->stats();




# 统计曲线 --------------------------
$time      = time();
$timeBegin = strtotime(date('Y-m-d 00:00:00'));
$useTime   = [];
$pushTime  = [];
$total     = [];
$arrKeys   = [];
for ($i = 0; $i < 1440; $i++)
{
  $timeLimit = $timeBegin + $i * 60;
  $k         = date('H:i', $timeLimit);
  $arrKeys[] = $k;

  if ($timeLimit < $time)
  {
    $total[$k]    = 0;
    $useTime[$k]  = 0;
    $pushTime[$k] = 0;
  }
}
$dayKey         = date('Ymd');
$totalTotalAll = 0;

if ($this->worker->isSSDB)
{
  $keys = $this->worker->ssdb->hlist("counter.total.$dayKey", "counter.total.$dayKey.z", 9999);
}
else
{
  $keys = [];
  foreach ($this->worker->series as $k => $v)
  {
     $keys[] = "counter.total.$dayKey.$k";
  }
}

$keyLen = strlen('counter.total.');
if ($keys)foreach ($keys as $k)
{
  $tmp            = $this->worker->redis->hGetAll($k) ?: [];
  $totalTotalAll += array_sum($tmp);

  foreach ($tmp as $k1 => $v1)
  {
    $total[$k1] += $v1;
  }

  $tmp = $this->worker->redis->hGetAll('counter.time.'. substr($k, $keyLen)) ?: [];
  foreach ($tmp as $k1 => $v1)
  {
    $useTime[$k1] += $v1 / 1000;
  }
}

$tmp = $this->worker->redis->hGetAll("counter.flush.time.$dayKey") ?: [];
foreach ($tmp as $k1 => $v1)
{
  $pushTime[$k1] = $v1 / 1000;
}

foreach ($useTime as & $item)
{
  $item = number_format($item, 3, '.', '');
}
unset($item);

?>
<style type="text/css">
  .list-group-item {border-color: #bce8f1;}
</style>
<div style="padding:0 15px;">
  <div class="row">
    <div class="col-md-4" style="margin-bottom:15px;">
      <ul class="list-group">
        <li class="list-group-item list-group-item-info">
          <h4 style="margin:2px 0">服务器占用内存</h4>
        </li>
        <li class="list-group-item">
          <div id="container-server" style="height:225px;"></div>
        </li>
      </ul>
    </div>
    <div class="col-md-4" style="margin-bottom:15px;">
      <ul class="list-group">
        <li class="list-group-item list-group-item-info">
          <h4 style="margin:2px 0"><?php echo $type;?>占用</h4>
        </li>
        <li class="list-group-item">
          <div id="container-redis" style="height:225px;"></div>
        </li>
      </ul>
    </div>
    <div class="col-md-4" style="margin-bottom: 15px;">
      <div style="height: 240px">
        <ul class="list-group">
          <li class="list-group-item list-group-item-info">
            <h4 style="margin:2px 0">服务器信息</h4>
          </li>
          <li class="list-group-item">
            <span class="badge" style="background:#5cb85c"><?php echo $this->worker->redis->hLen('queries');?></span>
            <a href="/admin/task/list/">任务数</a>
          </li>
          <li class="list-group-item">
            <span class="badge" style="background:#5bc0de"><?php
              $servers = $this->worker->redis->hGetAll('servers');
              if ($servers)
              {
                $count = 0;
                foreach ($servers as $item)
                {
                  $arr = @json_decode($item, true);
                  if ($arr && time() - $arr['updateTime'] < 120)
                  {
                    $count++;
                  }
                }
                echo $count ?: 1;
              }
              else
              {
                echo '1';
              }
              ?></span>
            集群服务器数
          </li>
          <li class="list-group-item">
            <span class="badge" style="background:#f0ad4e"><?php
              echo number_format($totalTotalAll, 0, '.', ',');
              unset($tmp, $k1);
              ?></span>
            今日处理数据数
          </li>
          <li class="list-group-item">
            <span class="badge" style="background:#f0ad4e"><?php
              $allTotal = $this->worker->redis->hVals('counter') ?: [];
              echo number_format(array_sum($allTotal), 0, '.', ',');
              ?></span>
            累计处理数据总数
          </li>
          <li class="list-group-item">
            <span class="badge" style="background:#f0ad4e"><?php
              echo number_format(EtServer::getCount(), 0, '.', ',');
            ?></span>
            启动后处理数据数
          </li>
          <li class="list-group-item">
            <span class="badge"><?php echo date('Y-m-d H:i:s', $stat['start_time']);?></span>
            当前服务器启动时间
          </li>
        </ul>

      </div>
    </div>

    <div class="col-md-12">
      <div class="panel panel-warning">
        <div class="panel-heading">
          <h3 class="panel-title">数据处理统计曲线</h3>
        </div>
        <div class="panel-body">
          <div id="container-total"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(function () {
    Highcharts.setOptions({global: {
      useUTC: false,
      timezoneOffset: 8
    }});

    var gaugeOptions = {

      chart: {
        type: 'solidgauge'
      },

      title: null,

      pane: {
        center: ['50%', '85%'],
        size: '140%',
        startAngle: -90,
        endAngle: 90,
        background: {
          backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || '#EEE',
          innerRadius: '60%',
          outerRadius: '100%',
          shape: 'arc'
        }
      },

      tooltip: {
        enabled: false
      },

      // the value axis
      yAxis: {
        stops: [
          [0.1, '#55BF3B'], // green
          [0.6, '#DDDF0D'], // yellow
          [0.8, '#DF5353'] // red
        ],
        lineWidth: 0,
        minorTickInterval: null,
        tickPixelInterval: 400,
        tickWidth: 0,
        title: {
          y: -90
        },
        labels: {
          y: 16
        }
      },

      plotOptions: {
        solidgauge: {
          dataLabels: {
            y: 5,
            borderWidth: 0,
            useHTML: true
          }
        }
      }
    };

    // The speed gauge
    $('#container-redis').highcharts(Highcharts.merge(gaugeOptions, {
      yAxis: {
        min: 0,
        max: <?php echo $maxSize;?>,
        title: {
          text: null
        }
      },

      credits: {
        enabled: false
      },

      series: [{
        name: '内存占用',
        data: [<?php echo number_format($info['used_memory'] / 1024 / 1024 / 1024, 2, '.', '');?>],
        dataLabels: {
          format: '<div style="text-align:center"><span style="font-size:25px;color:' +
          ((Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black') + '">{y}</span><br/>' +
          '<span style="font-size:12px;color:silver">GB</span></div>'
        },
        tooltip: {
          valueSuffix: ' GB'
        }
      }]
    }));

    // The speed gauge
    $('#container-server').highcharts(Highcharts.merge(gaugeOptions, {
      yAxis: {
        min: 0,
        max: 16,
        title: {
          text: null
        }
      },

      credits: {
        enabled: false
      },

      series: [{
        name: '内存占用',
        data: [<?php echo number_format($allMemoryTotal / 1024 / 1024 / 1024, 2, '.', '');?>],
        dataLabels: {
          format: '<div style="text-align:center"><span style="font-size:25px;color:' +
          ((Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black') + '">{y}</span><br/>' +
          '<span style="font-size:12px;color:silver">GB</span></div>'
        },
        tooltip: {
          valueSuffix: ' GB'
        }
      }]
    }));


    $('#container-total').highcharts({
      chart: {
        zoomType: 'x',
        marginBottom: 80
      },
      credits:{
        enabled: false
      },
      title: {
        text: null
      },
      xAxis: [{
        categories: <?php echo json_encode($arrKeys);?>,
        range: 100
      }],
      yAxis: [{ // Secondary yAxis
        gridLineWidth: 0,
        labels: {
          style: {
            color: Highcharts.getOptions().colors[0]
          }
        },
        title: {
          text: '处理数据数量',
          style: {
            color: Highcharts.getOptions().colors[0]
          }
        }
      }, {
        labels: {
          style: {
            format: '{value} ms',
            color: Highcharts.getOptions().colors[1]
          }
        },
        title: {
          text: '耗时（毫秒）',
          style: {
            color: Highcharts.getOptions().colors[1]
          }
        },
        opposite: true
      }],
      tooltip: {
        shared: true
      },
      scrollbar: {
        enabled: true,
        liveRedraw: true
      },

      legend: {
        align: 'center',
        y: 5,
        verticalAlign: 'bottom',
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
      },
      series: [{
        name: '处理数据数量',
        type: 'spline',
        yAxis: 0,
        data: <?php echo json_encode(array_values($total), JSON_NUMERIC_CHECK);?>,
        marker: {
          enabled: false
        }
      }, {
        name: '处理数据耗时',
        type: 'spline',
        data: <?php echo json_encode(array_values($useTime), JSON_NUMERIC_CHECK);?>,
        yAxis: 1,
        dashStyle: 'shortdot',
        tooltip: {
          valueSuffix: ' 毫秒'
        },
        marker: {
          enabled: false
        }
      }, {
        name: '推送合并耗时',
        type: 'spline',
        data: <?php echo json_encode(array_values($pushTime), JSON_NUMERIC_CHECK);?>,
        yAxis: 1,
        dashStyle: 'shortdot',
        tooltip: {
          valueSuffix: ' 毫秒'
        },
        marker: {
          enabled: false
        }
      }]
    });


});
</script>