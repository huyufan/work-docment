/*
 * =====================================================================================
 *
 *       Filename:  fwrite.c
 *
 *    Description:  fopen fwrite
 *
 *        Version:  1.0
 *        Created:  2016年08月24日 17时45分10秒
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
#include<errno.h>
#define FILE_PATH "/root/cpp/a.log"
#define MX(a,b) (a)>(b)?(a):(b)
int main(){
int i;
i=4*MX(3,4);
printf("%d",i);
printf("%s",FILE_PATH);

return 0;
}
