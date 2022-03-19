<?php

class Head
{
    // General params
    private string $title;
    private string $description;
    private string $charset;
    private string $image;
    private string $url;
    private string $keywords;

    // Open Graph params
    private string $og_type;
    private string $og_url;
    private string $og_title;
    private string $og_description;
    private string $og_image;

    // Twitter params
    private string $tw_card;
    private string $tw_url;
    private string $tw_title;
    private string $tw_description;
    private string $tw_image;

    public function __construct()
    {
        $this->setCharset(mb_internal_encoding());
    }

    #region General params
    /**
     * Returns formatted page title
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set the page title
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * Return page description
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Configure the page description
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getCharset(): string
    {
        return $this->charset;
    }

    /**
     * @param string $charset
     */
    public function setCharset(string $charset): void
    {
        $this->charset = $charset;
    }

    /**
     * @return string
     */
    public function getKeywords(): string
    {
        return $this->keywords;
    }

    /**
     * @param string $keywords
     */
    public function setKeywords(string $keywords): void
    {
        $this->keywords = $keywords;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }
    #endregion General params

    #region Open Graph params
    /**
     * @return string
     */
    public function getOgType(): string
    {
        return $this->og_type;
    }

    /**
     * @param string $og_type
     */
    public function setOgType(string $og_type): void
    {
        $this->og_type = $og_type;
    }

    /**
     * @return string
     */
    public function getOgUrl(): string
    {
        return $this->og_url;
    }

    /**
     * @param string $og_url
     */
    public function setOgUrl(string $og_url): void
    {
        $this->og_url = $og_url;
    }

    /**
     * @return string
     */
    public function getOgTitle(): string
    {
        return $this->og_title;
    }

    /**
     * @param string $og_title
     */
    public function setOgTitle(string $og_title): void
    {
        $this->og_title = $og_title;
    }

    /**
     * @return string
     */
    public function getOgDescription(): string
    {
        return $this->og_description;
    }

    /**
     * @param string $og_description
     */
    public function setOgDescription(string $og_description): void
    {
        $this->og_description = $og_description;
    }

    /**
     * @return string
     */
    public function getOgImage(): string
    {
        return $this->og_image;
    }

    /**
     * @param string $og_image
     */
    public function setOgImage(string $og_image): void
    {
        $this->og_image = $og_image;
    }
    #endregion Open Graph params

    #region Twitter params
    /**
     * @return string
     */
    public function getTwCard(): string
    {
        return $this->tw_card;
    }

    /**
     * @param string $tw_card
     */
    public function setTwCard(string $tw_card): void
    {
        $this->tw_card = $tw_card;
    }

    /**
     * @return string
     */
    public function getTwUrl(): string
    {
        return $this->tw_url;
    }

    /**
     * @param string $tw_url
     */
    public function setTwUrl(string $tw_url): void
    {
        $this->tw_url = $tw_url;
    }

    /**
     * @return string
     */
    public function getTwTitle(): string
    {
        return $this->tw_title;
    }

    /**
     * @param string $tw_title
     */
    public function setTwTitle(string $tw_title): void
    {
        $this->tw_title = $tw_title;
    }

    /**
     * @return string
     */
    public function getTwDescription(): string
    {
        return $this->tw_description;
    }

    /**
     * @param string $tw_description
     */
    public function setTwDescription(string $tw_description): void
    {
        $this->tw_description = $tw_description;
    }

    /**
     * @return string
     */
    public function getTwImage(): string
    {
        return $this->tw_image;
    }

    /**
     * @param string $tw_image
     */
    public function setTwImage(string $tw_image): void
    {
        $this->tw_image = $tw_image;
    }
    #endregion Twitter params

}