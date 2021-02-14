FROM node:latest

WORKDIR /application

COPY ./package.json /

COPY . .

RUN npm i

ENTRYPOINT ["npm", "run", "dev"]
