/*
 * =====================================================================================
 *
 *       Filename:  chain.c
 *
 *    Description:  chain
 *
 *        Version:  1.0
 *        Created:  2016年08月23日 17时15分48秒
 *       Revision:  none
 *       Compiler:  gcc
 *
 *         Author:  huyufan (cc), flat_boy@163.com
 *        Company:  xiaohu
 *
 * =====================================================================================
 */

#include<stdio.h>
int a=0;
void foo(void);
int main(){
int a=2;
int b=3;
 printf("1. main_b = %d\n", b);
    printf("main_a = %d\n", a);
    foo();
    printf("2. main_b = %d\n", b);
}
void foo(void){
int b=4;
printf("foo_a = %d\n",a);
printf("foo_b = %d\n",b);
}
