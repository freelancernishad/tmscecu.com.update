<template>
    <div>
      <ins class="adsbygoogle"
           style="display:block"
           :data-ad-client="adClient"
           :data-ad-slot="adSlot"
           :data-ad-format="adFormat"
           :data-full-width-responsive="fullWidthResponsive">
      </ins>
    </div>
  </template>

  <script>
  export default {
    props: {
      adClient: {
        type: String,
        default: "ca-pub-9489624253487221" // Your AdSense publisher ID
      },
      adSlot: {
        type: String,
        default: "1884709186" // Your AdSense ad slot ID
      },
      adFormat: {
        type: String,
        default: "auto"
      },
      fullWidthResponsive: {
        type: String,
        default: "true"
      }
    },
    mounted() {
      // Dynamically load AdSense script if not already loaded
      if (!window.adsbygoogle) {
        const adScript = document.createElement("script");
        adScript.async = true;
        adScript.src = "https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js";
        adScript.setAttribute("data-ad-client", this.adClient);
        adScript.crossOrigin = "anonymous";
        document.head.appendChild(adScript);
      }

      // Initialize the ad
      this.loadAd();
    },
    methods: {
      loadAd() {
        try {
          (adsbygoogle = window.adsbygoogle || []).push({});
        } catch (e) {
          console.error("AdSense error:", e);
        }
      }
    }
  };
  </script>

  <style scoped>
  /* Optional: Add styles for the ad container if needed */
  </style>
