/*
 * =====================================================================================
 *
 *       Filename:  app4.c
 *
 *    Description:  sdkdedjjej
 *
 *        Version:  1.0
 *        Created:  2016年06月20日 16时12分28秒
 *       Revision:  none
 *       Compiler:  gcc
 *
 *         Author:  huyufan (cc), flat_boy@163.com
 *        Company:  xiaohu
 *
 * =====================================================================================
 */

#include<stdio.h>
int main(){
int a,b,c,temp;
printf("please input a,b,c\n");
scanf("%d%d%d",&a,&b,&c);
if(a>b){
  temp=a;
  a=b;
  b=temp;
 }
if(a>c){
  temp=a;
  a=c;
  c=temp;
}

if(b>c){
temp=b;
b=c;
c=temp;
}

printf("%d%d%d",a,b,c);
}

