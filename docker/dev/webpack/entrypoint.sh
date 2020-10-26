#!/usr/bin/env sh
set -e
cd /src
yarn install
exec yarn encore "$@"