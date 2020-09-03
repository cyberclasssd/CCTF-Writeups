#!/bin/bash
flag="$(cat chall.txt)"
for i in {1..20}; do
	flag=$(echo $flag | base64 -d)
done
echo $flag
