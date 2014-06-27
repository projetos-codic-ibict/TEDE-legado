<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:mtd-br="http://www.ibict.br/schema/" xmlns:oai-pmh="http://www.openarchives.org/OAI/2.0/" xmlns:oai_dc="http://www.openarchives.org/OAI/2.0/oai_dc/" xmlns:dc="http://purl.org/dc/elements/1.1/" exclude-result-prefixes="dc">
	<xsl:output indent="yes" encoding="utf-8" version="1.0" method="xml" media-type="screen" omit-xml-declaration="yes"/>
	<xsl:template match="/oai-pmh:OAI-PMH|OAI-PMH" name="oaipmh">
		<xsl:text disable-output-escaping="yes">	&lt;OAI-PMH xmlns="http://www.openarchives.org/OAI/2.0/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.openarchives.org/OAI/2.0/ http://www.openarchives.org/OAI/2.0/OAI-PMH.xsd"></xsl:text>
		<xsl:copy-of select="oai-pmh:responseDate"/>
		<xsl:copy-of select="oai-pmh:request"/>
		<xsl:apply-templates select="oai-pmh:*"/>
		<xsl:text disable-output-escaping="yes">	&lt;/OAI-PMH></xsl:text>
	</xsl:template>
	<xsl:template match="oai-pmh:ListRecords|ListRecords">
		<xsl:element name="ListRecords">
			<xsl:apply-templates/>
		</xsl:element>
	</xsl:template>
	<xsl:template match="oai-pmh:ListIdentifiers|ListIdentifiers">
		<xsl:element name="ListIdentifiers">
			<xsl:apply-templates/>
		</xsl:element>
	</xsl:template>
	<xsl:template match="oai-pmh:GetRecord|GetRecord">
		<xsl:element name="GetRecord">
			<xsl:apply-templates/>
		</xsl:element>
	</xsl:template>
	<xsl:template match="oai-pmh:record|record">
		<xsl:element name="record">
			<xsl:apply-templates/>
		</xsl:element>
	</xsl:template>
	<xsl:template match="oai-pmh:header|header">
		<xsl:element name="header">
			<xsl:if test="@status">
				<xsl:attribute name="status"><xsl:value-of select="@status"/></xsl:attribute>
			</xsl:if>
			<xsl:apply-templates/>
		</xsl:element>
	</xsl:template>
	<xsl:template match="oai-pmh:identifier|identifier">
		<xsl:element name="identifier">
			<xsl:apply-templates/>
		</xsl:element>
	</xsl:template>
	<xsl:template match="oai-pmh:datestamp|datestamp">
		<xsl:element name="datestamp">
			<xsl:apply-templates/>
		</xsl:element>
	</xsl:template>
	<xsl:template match="oai-pmh:metadata|metadata">
		<xsl:element name="metadata">
			<xsl:apply-templates select="mtd-br:*"/>
		</xsl:element>
	</xsl:template>
	<xsl:template match="mtd-br:mtdbr">
		<xsl:text disable-output-escaping="yes">	&lt;oai_dc:dc xmlns:oai_dc="http://www.openarchives.org/OAI/2.0/oai_dc/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.openarchives.org/OAI/2.0/oai_dc/ http://www.openarchives.org/OAI/2.0/oai_dc.xsd"></xsl:text>
		<xsl:for-each select="mtd-br:Titulo">
			<xsl:element name="dc:title">
				<xsl:value-of select="./text()"/>
			</xsl:element>
		</xsl:for-each>
		<!-- xsl:copy-of select="node()" / -->
		<!-- Nao usaremos o elemento "alternativeTitle"__________________________ -->
		<xsl:comment>Nao usaremos o elemento alternativeTitle</xsl:comment>
		<xsl:for-each select="mtd-br:Autor">
			<xsl:for-each select="mtd-br:Nome">
				<dc:creator>
					<xsl:value-of select="./text()"/>
				</dc:creator>
			</xsl:for-each>
		</xsl:for-each>
		<xsl:for-each select="mtd-br:Assunto">
			<xsl:element name="dc:subject">
				<xsl:value-of select="./text()"/>
			</xsl:element>
		</xsl:for-each>
		<xsl:for-each select="mtd-br:Resumo">
			<xsl:element name="dc:description">
				<xsl:value-of select="./text()"/>
			</xsl:element>
		</xsl:for-each>
		<xsl:for-each select="mtd-br:BibliotecaDigital">
			<xsl:for-each select="mtd-br:Nome">
				<xsl:element name="dc:publisher">
					<xsl:value-of select="./text()"/>
				</xsl:element>
			</xsl:for-each>
		</xsl:for-each>
		<xsl:for-each select="mtd-br:Contribuidor">
			<xsl:element name="dc:contributor">
				<xsl:value-of select="mtd-br:Nome/text()"/>
			</xsl:element>
		</xsl:for-each>
		<xsl:element name="dc:date">
			<xsl:value-of select="mtd-br:DataDefesa/text()"/>
		</xsl:element>
		<xsl:element name="dc:type">
			<xsl:attribute name="xml:lang">EN</xsl:attribute>
			<xsl:text>Electronic Thesis or Dissertation</xsl:text>
		</xsl:element>
		<xsl:element name="dc:type">
			<xsl:attribute name="xml:lang">PT</xsl:attribute>
			<xsl:text>Tese ou DissertaÃ§Ã£o EletrÃ´nica</xsl:text>
		</xsl:element>
		<xsl:for-each select="mtd-br:BibliotecaDigital">
			<xsl:for-each select="mtd-br:URLDocumento">
				<xsl:if test="@Formato!='' ">
					<xsl:element name="dc:format">
						<xsl:value-of select="./@Formato"/>
					</xsl:element>
				</xsl:if>
				<xsl:element name="dc:identifier">
					<xsl:value-of select="./text()"/>
				</xsl:element>
			</xsl:for-each>
		</xsl:for-each>
		<!-- Linguagem, opcional ___________________________________________ -->
		<xsl:element name="dc:language">PT</xsl:element>
		<xsl:for-each select="mtd-br:Cobertura">
			<xsl:element name="dc:coverage">
				<xsl:value-of select="./text()"/>
			</xsl:element>
		</xsl:for-each>
		<xsl:for-each select="mtd-br:Direitos">
			<xsl:element name="dc:rights">
				<xsl:value-of select="./text()"/>
			</xsl:element>
		</xsl:for-each>
		<xsl:text disable-output-escaping="yes">&lt;/oai_dc:dc></xsl:text>
	</xsl:template>
</xsl:stylesheet>
