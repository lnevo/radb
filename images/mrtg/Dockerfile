FROM hamiltont/docker-cron

MAINTAINER Lee Nevo <lnevo@usa.net>

ENV DEBIAN_FRONTEND noninteractive

RUN apt-get update && apt-get install -y php5-cli mrtg wget

RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*
