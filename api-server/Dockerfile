# syntax=docker/dockerfile:1

FROM python:3.8-slim-buster

RUN apt-get update
RUN apt-get install -y git
RUN pip install Flask

WORKDIR /
RUN git clone https://github.com/linuxation/ostamp-22.git

WORKDIR /ostamp-22/
CMD [ "python3", "app.py"]
EXPOSE 5000
