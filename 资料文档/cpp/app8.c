/*
 * =====================================================================================
 *
 *       Filename:  app8.c
 *
 *    Description:  指针
 *
 *        Version:  1.0
 *        Created:  2016年06月21日 16时39分36秒
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
char *lines[5]={"xiao","del","sd","qwe","zse"};
char *char1=lines[1];
char *char2=*(lines+3);
printf("%s",char1);
printf("%s",char2);

return 0;

}
