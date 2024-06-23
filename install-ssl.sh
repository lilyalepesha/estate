#!/bin/bash

# Add the library path to LD_LIBRARY_PATH
export LD_LIBRARY_PATH=/usr/lib64:$LD_LIBRARY_PATH

# Install required packages
apt-get update && apt-get install -y libssl1.1 libssl-dev
