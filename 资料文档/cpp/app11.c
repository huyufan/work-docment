/*
 * =====================================================================================
 *
 *       Filename:  app11.c
 *
 *    Description:  &
 *
 *        Version:  1.0
 *        Created:  2016年06月27日 16时56分16秒
 *       Revision:  none
 *       Compiler:  gcc
 *
 *         Author:  huyufan (cc), flat_boy@163.com
 *        Company:  xiaohu
 *
 * =====================================================================================
 */

#include<stdio.h>
int add(int *a,int *b);
int main(){
int a=5;
int b=3;
add(&a,&b);
printf("a=%d,b=%d",a,b);
return 0;
}
int add(int *a, int *b ){
int temp =*a;
*a=*b;
*b=temp;
}
