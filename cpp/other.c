/*
 * =====================================================================================
 *
 *       Filename:  other.c
 *
 *    Description:  other chain
 *
 *        Version:  1.0
 *        Created:  2016年08月23日 17时26分10秒
 *       Revision:  none
 *       Compiler:  gcc
 *
 *         Author:  huyufan (cc), flat_boy@163.com
 *        Company:  xiaohu
 *
 * =====================================================================================
 */

#include<stdio.h>

int x=2;
int y=3;
int z=4;

void moo(int x,int *y){
int z;
x=x+3;
*y=*y+3;
z=z+3;
}
