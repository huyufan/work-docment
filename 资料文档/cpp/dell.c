/*
 * =====================================================================================
 *
 *       Filename:  dell.c
 *
 *    Description:  stdlib.h
 *
 *        Version:  1.0
 *        Created:  2016年08月24日 10时08分37秒
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
char gamer; //玩家出拳
int computer; //电脑出拳
int result; //比赛结果
while(1){
printf("这是一个猜拳的小游戏,请输入你要出的拳头:\n");
printf("A:剪刀\nB:石头\nC:布\nD:不挖了\n");
scanf("%c%*c",&gamer);
printf("%c",gamer);
switch(gamer){

case 65 | 97:
gamer=4;break;
case 66 | 98:
gamer=7;break;
case 67 | 99:
gamer=10; break;
case 68 |100:
return 0;
default:
printf("你的选择为%c选择错误...\n");
getchar();
system("clear");
break;
}
srand((unsigned)time(NULL));
computer=rand()%3;
result=(int)gamer +computer;
printf("电脑出了");
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
if(result==6 || result == 7 || result == 11){printf("您赢了\n");}
else if(result == 10 || result == 5 || result==9){printf("电脑赢了\n");}
else{
printf("平手\n");
}
}
return 0;
}
