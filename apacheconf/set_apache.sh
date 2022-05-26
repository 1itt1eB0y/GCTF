#!/bin/bash

cp ports.conf /etc/apache2/ports.conf
cp backend.conf /etc/apache2/sites-available/backend.conf
cp frontend.conf /etc/apache2/sites-available/frontend.conf
a2dissite 000-default
a2enmod rewrite
a2ensite backend
a2ensite frontend
service apache2 reload
service apache2 restart