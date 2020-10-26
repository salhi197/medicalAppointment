FROM node:current-alpine

RUN apk add yarn
RUN mkdir /src
WORKDIR /src
RUN yarn install
COPY ./entrypoint.sh /entrypoint.sh

ENTRYPOINT [ "/entrypoint.sh" ]
CMD [ "dev", "--watch" ]