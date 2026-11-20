

<!-- local-development:start -->
# Desarrollo local

Puedes abrir este repositorio en VS Code, Antigravity o Sublime Text. El compilador y los servicios necesarios dependen del componente indicado abajo.

## Node.js

Usa los scripts y el archivo de bloqueo de cada componente; revisa `engines` antes de elegir Node. La máquina de revisión tiene Node 22.23.1, pero eso no certifica compatibilidad de las dependencias antiguas.

[playlist-master/playlistcore/package.json](<playlist-master/playlistcore/package.json>): `prod`, `dev`.

```powershell
Set-Location 'playlist-master/playlistcore'
npm.cmd install
npm.cmd run
```

## Android / Gradle

Importa en Android Studio la carpeta que contiene `settings.gradle`. Hay que revisar juntos el wrapper, Android Gradle Plugin, JDK y SDK antes de sincronizar. Guarda la ruta del SDK en `local.properties`, ignorado por Git, y configura localmente las claves Maps/Firebase. Esta revisión no acredita todavía un APK válido.

## PHP

Usa un runtime PHP aislado compatible con la aplicación. Ejecuta Composer únicamente en la carpeta con `composer.json`; las aplicaciones Laravel antiguas requieren revisar también PHP y dependencias. Configura las credenciales de base de datos localmente.

## Componentes y validación

Inventario y compilaciones locales del 2026-11-15. Una compilación correcta no acredita todavía interacción, compatibilidad de base de datos, instalador ni despliegue.

| Componente | Tipo / destino | Validación |
| --- | --- | --- |
| [playlist-master/Playlist/app/build.gradle](<playlist-master/Playlist/app/build.gradle>) | gradle | Sin ejecutar |
| [playlist-master/Playlist/build.gradle](<playlist-master/Playlist/build.gradle>) | gradle | Sin ejecutar |
| [playlist-master/Playlist/settings.gradle](<playlist-master/Playlist/settings.gradle>) | gradle | Sin ejecutar |
| [playlist-master/playlistcore/package.json](<playlist-master/playlistcore/package.json>) | node | Sin ejecutar |

## Archivos ignorados

`.gitignore` excluye credenciales locales, estado del editor y salidas de las herramientas detectadas. No deja de versionar archivos que ya estaban en Git. Los manifiestos, archivos de bloqueo, recursos fuente y scripts de esquema forman parte del código.
<!-- local-development:end -->


<!-- improvements-20261119:start -->
## Mejoras y verificación — 2026-11-19 (API REST completa de Playlist en Laravel + gestor web interactivo)

- **Cambios:** Implementados modelo `PlaylistTrack`, migración `create_playlist_tracks_table`, controlador REST validado `PlaylistController` (`index`, `show`, `store`, `update`, `destroy`) y rutas `/api/tracks` en `playlistcore`; añadido además `web-player/index.html` con cola persistente en `localStorage`, búsqueda, reordenamiento y tema claro/oscuro.
- **Validación:** Verificación estructural PHP (4 archivos Laravel) + `node --check` (Node 24) sobre la lógica JS de `web-player/index.html`.
<!-- improvements-20261119:end -->
