#!/usr/bin/env bash
set -euo pipefail

ROOT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
HOST="${HOST:-127.0.0.1}"
PORT="${PORT:-8000}"

cd "$ROOT_DIR/public"

exec php \
  -d post_max_size=64M \
  -d upload_max_filesize=16M \
  -d max_file_uploads=20 \
  -d memory_limit=256M \
  -S "$HOST:$PORT" \
  "$ROOT_DIR/vendor/laravel/framework/src/Illuminate/Foundation/resources/server.php"
