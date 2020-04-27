<xsl:stylesheet xmlns:xsl = "http://www.w3.org/1999/XSL/Transform" version = "1.0">
<xsl:output omit-xml-declaration="yes" method="xml" indent="no" encoding="UTF-8" />
<xsl:template match = "/icestats">
<xsl:for-each select="source">
<xsl:if test="artist">
<div id="artist">Artist: <xsl:value-of select="artist" /></div>
</xsl:if>
<xsl:if test="title">
<div id="title">Song: <xsl:value-of select="title" /></div>
</xsl:if>
<xsl:if test="listeners">
<div id="listeners"><xsl:value-of select="listeners" /> listeners</div>
</xsl:if>
</xsl:for-each>
</xsl:template>
</xsl:stylesheet>
