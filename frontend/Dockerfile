FROM node:22-alpine
WORKDIR /app
COPY . .
RUN npm install -g http-server
CMD ["http-server", "-p", "8080"]