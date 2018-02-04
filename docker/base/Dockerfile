FROM debian:jessie

ENV DEBIAN_FRONTEND noninteractive

RUN apt-get update -y
RUN apt-get install -y aptitude curl wget

RUN mkdir /logs /cache

VOLUME /logs
VOLUME /cache
