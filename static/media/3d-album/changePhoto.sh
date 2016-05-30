#!/bin/bash
list=()
i=0;
for f in `ls *.jpeg`
do
     mv $f ${f:4}
done

