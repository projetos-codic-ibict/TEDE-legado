#!/bin/sh
echo "Atualizando o protocolo OAI-PMH"
echo "Aguarde..."
svn export --force  http://tede-oai-pmh.googlecode.com/svn/trunk/ .
echo "Atualizacao concluida"
