import $ from 'jquery'

class HeroVideo extends window.HTMLDivElement {
  constructor (...args) {
    const self = super(...args)
    self.init()
    return self
  }

  init () {
    this.$ = $(this)
    this.resolveElements()
    this.bindFunctions()
    this.bindEvents()
    var width = this.$iframe.outerWidth();
    var height = this.$iframe.outerHeight();
    var aspectRatio = 100 * height / width;
    this.$iframe.css({ top: 0, left: 0, position: 'absolute', width: '100%', height: '100%'})
    this.$videoPlayer.css({'padding-bottom': aspectRatio + '%'})
  }

  resolveElements () {
    this.$posterImage = $('.figure-image', this)
    this.$videoPlayer = $('.video-player', this)
    this.$iframe = $('iframe', this)
    this.$window = $(window)
  }

  bindFunctions () {
    this.loadVideo = this.loadVideo.bind(this)
    this.videoIsLoaded = this.videoIsLoaded.bind(this)
  }

  bindEvents () {
    this.$window.on('load', this.loadVideo)
  }

  loadVideo () {
    this.$iframe.on('load', this.videoIsLoaded.bind(this))
    this.$iframe.attr('src', this.$iframe.data('src'))
    this.$videoPlayer.addClass('video-player--isLoading')
  }

  videoIsLoaded () {
    this.$videoPlayer.removeClass('video-player--isLoading')
    this.$videoPlayer.addClass('video-player--isLoaded')
    this.$posterImage.addClass('figure-image--isHidden')
  }
}

window.customElements.define('flynt-hero-video', HeroVideo, { extends: 'div' })
