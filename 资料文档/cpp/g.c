/*
 * =====================================================================================
 *
 *       Filename:  g.c
 *
 *    Description:  gdb
 *
 *        Version:  1.0
 *        Created:  2016年08月22日 15时48分47秒
 *       Revision:  none
 *       Compiler:  gcc
 *
 *         Author:  huyufan (cc), flat_boy@163.com
 *        Company:  xiaohu
 *
 * =====================================================================================
 */

#include<stdio.h>

int add(int a,int b)
{
return a+b;
}

int main(){
int sum[5]={0,0,0,0,0};
int arr1[5]={1,2,3,4,5};
int arr2[5]={6,7,8,9,10};
int i;
for(i=0;i<5;i++){
sum[i]=add(arr1[i],arr2[i]);
}
printf("%d",sum[1]);
return 0;
}
