#!/bin/bash
SERVER=api-server
JSON=$(curl -s http://$SERVER:5000/api/list)
TABLE=$(echo $JSON | jq -r '(["NAME","","GROUP","MARK"] | (., map(length*"-"))), (.[] | [.name, .group, .mark]) | @tsv')
printf "$TABLE"; echo
