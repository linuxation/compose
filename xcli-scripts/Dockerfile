# syntax=docker/dockerfile:1

FROM ubuntu:latest
RUN apt-get update
RUN apt-get install -y iproute2 net-tools iputils-ping curl jq

WORKDIR /
COPY scripts scripts

WORKDIR /scripts
RUN find /scripts -type f -exec sed 's/^M$//' {} \;
RUN find /scripts -type f -exec chmod +x {} \;

ENV PATH=/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin:/scripts
CMD [ "sleep", "infinity"]
