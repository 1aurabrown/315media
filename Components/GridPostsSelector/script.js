import $ from 'jquery'

class GridPostsSelector extends window.HTMLElement {
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
  }

  resolveElements () {
    this.$video = $('video', this)
    this.$coverVideo = $('.content-link--Video', this)
  }

  bindFunctions () {
    this.playVideo = this.playVideo.bind(this)
    this.pauseVideo = this.pauseVideo.bind(this)
  }

  bindEvents () {
    this.$coverVideo.on('mouseenter', this.playVideo)
    this.$coverVideo.on('mouseleave', this.pauseVideo)
  }

  playVideo (e) {
    this.$video.play()
    console.log('play')
  }

  pauseVideo (e) {
    this.$video.pause()
    console.log('pause')
  }
}

window.customElements.define('flynt-grid-posts-selector', GridPostsSelector, { extends: 'div' })
