import $ from 'jquery'

class HeroVideoHome extends window.HTMLDivElement {
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
    this.videoSize()
  }

  videoSize () {
    var windowHeight = $(window).height()
    var windowWidth = $(window).width()
    var videoHeight = this.$iframe.outerHeight()
    var videoWidth = this.$iframe.outerWidth()
    var scaleV = windowHeight / videoHeight
    var scaleH = windowWidth / videoWidth

    var scale = (Math.max(scaleV, scaleH))
    if (windowHeight < windowWidth) {
      console.log(scale)
      this.$iframe.css({
        '-webkit-transform': 'scale(' + scale + ')',
        transform: 'scale(' + scale + ')'
      })
    } else {
      this.$iframe.removeAttr('style')
    }
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
    this.videoSize = this.videoSize.bind(this)
  }

  bindEvents () {
    this.$window.on('load', this.loadVideo)
    this.$window.on('resize', this.videoSize)
  }

  loadVideo () {
    if (!this.$iframe) return
    this.$iframe.on('load', this.videoIsLoaded.bind(this))
    this.$iframe.attr('src', this.$iframe.data('src'))
    // this.$videoPlayer.addClass('video-player--isLoading')
  }

  videoIsLoaded () {
    if (!this.$videoPlayer) return
    this.$videoPlayer.removeClass('video-player--isLoading')
    this.$videoPlayer.addClass('video-player--isLoaded')
    if (!this.$posterImage) return
    this.$posterImage.addClass('figure-image--isHidden')
  }
}

window.customElements.define('flynt-hero-video-home', HeroVideoHome, { extends: 'div' })
