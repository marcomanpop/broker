#!/bin/bash

# SFTP batch upload script
cat > /tmp/sftp_commands.txt <<EOF
cd public_html
put -r /workspaces/broker/*
bye
EOF

lftp -u civihqzq,azRRM9ltEfXD -p 21098 sftp://civigrantinterest.online < /tmp/sftp_commands.txt
