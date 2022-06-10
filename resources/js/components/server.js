'use strict'
var fs = require('fs')
var path = require('path')
// Define global.Vue para app.js funcionando del lado servidor
global.Vue = require('vue')
// Obtén la estructura HTML
var layout = fs.readFileSync('./views/layouts/MenuRepositorio.blade.html')
// Crea un renderizador
var renderer = require('vue-server-renderer').createRenderer()
// Crea un servidor express
var express = require('express')
var server = express()
// Sirve los archivos desde el directorio de recursos
server.use('/assets', express.static(
  path.resolve(__dirname, 'assets')
))
// Maneja las peticiones GET
server.get('*', function (request, response) {
  // Renderiza nuestra app Vue a una cadena de texto
  renderer.renderToString(
    // Crea una instancia de app
    require('./assets/app')(),
    // Maneja el resultado del renderizado
    function (error, html) {
      // Si ocurre un error durante el renderizado
      if (error) {
        // Registra el error en la consola
        console.error(error)
        // Avisa al cliente que algo sucedio
        return response
          .status(500)
          .send('Server Error')
      }
      // Envia la estructura con el HTML renderizado de la aplicación
      response.send(layout.replaced('<iv id="app"></div>', html))
    }
  )
})
// Escucha en el puerto 5000
server.listen(5000, function (error) {
  if (error) throw error
  console.log('Server is running at localhost:8000')
})