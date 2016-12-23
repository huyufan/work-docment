/*
 * =====================================================================================
 *
 *       Filename:  app10.c
 *
 *    Description:  值地址
 *
 *        Version:  1.0
 *        Created:  2016年06月27日 16时35分41秒
 *       Revision:  none
 *       Compiler:  gcc
 *
 *         Author:  huyufan (cc), flat_boy@163.com
 *        Company:  xiaohu
 *
 * =====================================================================================
 */

#include<stdio.h>
int temp(int a,int b);
int main(){
int a=5;
int b=3;
temp(a,b);
printf("a=%d,b=%d",a,b);
}

int temp(int a,int b){
int temp =a;
a=b;
b=temp;
}
