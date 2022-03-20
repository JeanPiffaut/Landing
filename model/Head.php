<?php

include_once dirname(__FILE__) . "/../config.php";

class Head
{
    // General params
    private string $title;
    private string $description;
    private string $charset;
    private string $image;
    private string $url;
    private string $keywords;
    private string $favicon;

    // Open Graph params
    private string $og_type = "website";
    private string $og_url;
    private string $og_title;
    private string $og_description;
    private string $og_image;

    // Twitter params
    private string $tw_card = "summary";
    private string $tw_url;
    private string $tw_title;
    private string $tw_description;
    private string $tw_image;

    public function __construct($title, $description = null)
    {
        $this->setTitle($title);
        if ($description !== null) {
            $this->setDescription($description);
        }
        $this->setCharset(mb_internal_encoding());

        global $CONFIG;
        $this->setFavicon($CONFIG['head']['favicon']);
        $this->setUrl($CONFIG['links']['url']);
    }

    private function PrintParams()
    {
        // General params
        ?>
        <meta http-equiv="Content-Type" content="text/html; charset=<?= $this->getCharset(); ?>">
        <link rel="icon" href="<?= $this->getFavicon(); ?>">
        <meta name="title" content="<?= $this->getTitle(); ?>">
        <?php

        if (isset($this->description) && $this->description != "") {
            ?>
            <meta name="description" content="<?= $this->getDescription(); ?>">
            <?php
        }

        if (isset($this->keywords) && $this->keywords != "") {
            ?>
            <meta name="keywords" content="<?= $this->getKeywords(); ?>">
            <?php
        }

        // Open Graph params
        ?>
        <meta property="og:type" content="<?= $this->getOgType(); ?>">
        <?php

        if (isset($this->og_url) && $this->og_url != "") {
            ?>
            <meta property="og:url" content="<?= $this->getOgUrl(); ?>">
            <?php
        } elseif (isset($this->url) && $this->url != "") {
            ?>
            <meta property="og:url" content="<?= $this->getUrl(); ?>">
            <?php
        }

        if (isset($this->og_title) && $this->og_title != "") {
            ?>
            <meta property="og:title" content="<?= $this->getOgTitle(); ?>">
            <?php
        } elseif (isset($this->title) && $this->title != "") {
            ?>
            <meta property="og:title" content="<?= $this->getTitle(); ?>">
            <?php
        }

        if (isset($this->og_description) && $this->og_description != "") {
            ?>
            <meta property="og:description" content="<?= $this->getOgDescription(); ?>">
            <?php
        } elseif (isset($this->description) && $this->description != "") {
            ?>
            <meta property="og:description" content="<?= $this->getDescription(); ?>">
            <?php
        }

        if (isset($this->og_image) && $this->og_image != "") {
            ?>
            <meta property="og:image" content="<?= $this->getOgImage(); ?>">
            <?php
        } elseif (isset($this->image) && $this->image != "") {
            ?>
            <meta property="og:image" content="<?= $this->getImage(); ?>">
            <?php
        }

        // Twitter params
        ?>
        <meta property="twitter:card" content="<?= $this->getTwCard(); ?>">
        <?php

        if (isset($this->tw_url) && $this->tw_url != "") {
            ?>
            <meta property="twitter:url" content="<?= $this->getTwUrl(); ?>">
            <?php
        } elseif (isset($this->url) && $this->url != "") {
            ?>
            <meta property="twitter:url" content="<?= $this->getUrl(); ?>">
            <?php
        }

        if (isset($this->tw_title) && $this->tw_title != "") {
            ?>
            <meta property="twitter:title" content="<?= $this->getTwTitle(); ?>">
            <?php
        } elseif (isset($this->title) && $this->title != "") {
            ?>
            <meta property="twitter:title" content="<?= $this->getTitle(); ?>">
            <?php
        }

        if (isset($this->tw_description) && $this->tw_description != "") {
            ?>
            <meta property="twitter:description" content="<?= $this->getTwDescription(); ?>">
            <?php
        } elseif (isset($this->description) && $this->description != "") {
            ?>
            <meta property="twitter:description" content="<?= $this->getDescription(); ?>">
            <?php
        }

        if (isset($this->tw_image) && $this->tw_image != "") {
            ?>
            <meta property="twitter:image" content="<?= $this->getTwImage(); ?>">
            <?php
        } elseif (isset($this->image) && $this->image != "") {
            ?>
            <meta property="twitter:image" content="<?= $this->getImage(); ?>">
            <?php
        }
    }

    private function PrintStyles()
    {
        global $CONFIG;
        foreach ($CONFIG['style'] as $file) {
            ?>
            <link rel="stylesheet" href="<?= $file; ?>">
            <?php
        }
    }

    private function PrintJavascript()
    {
        global $CONFIG;
        foreach ($CONFIG['javascript'] as $file) {
            ?>
            <script type="text/javascript" src="<?= $file ?>"></script>
            <?php
        }
    }

    public function PrintHead()
    {
        ?>
        <head>
            <title><?= $this->getTitle(); ?></title>
            <?php
            $this->PrintParams();
            $this->PrintJavascript();
            $this->PrintStyles();
            ?>
        </head>
        <?php
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

    /**
     * @return string
     */
    public function getFavicon(): string
    {
        return $this->favicon;
    }

    /**
     * @param string $favicon
     */
    public function setFavicon(string $favicon): void
    {
        $this->favicon = $favicon;
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