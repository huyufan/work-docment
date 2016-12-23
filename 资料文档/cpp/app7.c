/*
 * =====================================================================================
 *
 *       Filename:  app7.c
 *
 *    Description:  sdsdh
 *
 *        Version:  1.0
 *        Created:  2016年06月21日 11时50分16秒
 *       Revision:  none
 *       Compiler:  gcc
 *
 *         Author:  huyufan (cc), flat_boy@163.com
 *        Company:  xiaohu
 *
 * =====================================================================================
 */

#include<stdio.h>
#include<stdlib.h>
#include<time.h>

int main(){
 char gamer; 
 int computer;
 int result;
while(1){
printf("这是一个猜拳的小游戏，请输入你要出的拳头：\n");
printf("A:剪刀\nB:石头\nC:布\nD:不玩了\n");
scanf("%c%*c",&gamer);
switch(gamer){
case 65:
case 97:
gamer=4;
break;
 case 66:  //B
            case 98:  //b
                gamer=7;
                break;
            case 67:  //C
            case 99:  //c
                gamer=10;
                break;
            case 68:  //D
            case 100:  //d
                return 0;
		default:
   printf("您的选择%c出错,退出...",gamer);
    getchar();
system("clear");
return 0;
break;
}
srand((unsigned)time(NULL));
computer=rand()%3;
result=(int)gamer + computer;
printf("电脑输入");
switch(computer){
case 0:printf("剪刀\n");break;
case 1:printf("石头\n");break;
case 2:printf("布\n");break;
}
printf("你出了");
switch(gamer){
case 4:printf("剪刀\n");break;
case 7:printf("石头\n");break;
case 10:printf("布\n");break;
}
if(result==7 || result == 11 || result ==6)printf("你赢了!");
else if(result == 10 || result ==5 || result==9)printf("电脑赢了");
else
printf("平手");
shell("pause>nul&&clear");
}
return 0;
}
