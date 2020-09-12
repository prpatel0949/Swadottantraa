const ChatPlugin = {
  element: "",
  questions: {},
  question: "",
  options: [],
  result: [],
  temp: {},
  replay: [],
  score: 0,
  init(element, data) {
    this.score = 0
    element.empty()
    $(".chat_replay").empty()
    this.element = element
    this.questions = data.questions
    this.replay = data.replay
    var question_id = 1
    if(data.initialQuestion) { question_id = data.initialQuestion }
    this.setQuestion(question_id)
  },
  setQuestion(question_id) {
    if(question_id && this.questions[question_id]) {
      var data = this.questions[question_id]
      this.temp.question = this.question = data.question
      this.options = data.options
      this.addQuestion()
    }else{
      console.log("No More Questions!")
    }
  },
  addQuestion() {
    setTimeout(function(){
      $(".msg_received.typing").remove()
      if(this.question) {
        var html = `<div class="msg_received">${this.question}</div>`
        this.element.append(html)
        this.addOptions()
      }
    }.bind(this), 1000)
  },
  addOptions() {
    if(this.options && this.options.length > 0){
      this.options.forEach(function(item, index){
        var next = ""
        if(item.next) {
          next = `data-question="${item.next}"`
        }
        var replay = ``
        if(item.replay && item.replay != '') {
          replay = `data-replay="${item.replay}"`
        }
        var html = `<img ${next} ${replay} data-text="${item.answer}" src="./assets/img/${item.answer}.png" />`
        $(".chat_replay").append(html)
      }.bind(this))
      var _this = this
      $(".chat_replay img").click(function() {
        $(".chat_replay").empty()
        _this.temp.answer = $(this).data('text')
        _this.score += _this.temp.answer
        _this.result.push(_this.temp)
        _this.temp= {}
        _this.addReplay($(this).data('text'))
        setTimeout(function(){
          if($(this).data('question')) {
            _this.element.append(`<div class="msg_received typing">typing...</div>`)
            if($(this).data('replay')) {
              _this.setReplay($(this).data('replay'), $(this).data('question'))
            }else{
              _this.setQuestion($(this).data('question'))
            }
          }else{
            _this.setFinish()
          }
        }.bind(this), 1000)
        
      })
    }
  },
  setReplay(replay, question) {
    setTimeout(function(){
      $(".msg_received.typing").remove()
      this.element.append(`<div class="msg_received">${replay}</div>`)

      setTimeout(function(){
        $(".msg_received.typing").remove()
        this.element.append(`<div class="msg_received typing">typing...</div>`)
        this.setQuestion(question)
      }.bind(this), 1000)

    }.bind(this), 1000)
  },
  addReplay(answer) {
    html = `<div class="msg_sent">`;
    if(answer > 0) {
      for(var i = 0; i < answer; i++) {
        html += `<i class="fa fa-star text-warning ml-1 mr-1"></i>` 
      }
    }
    html += `</div>`;
    this.element.append(html)
  },
  setFinish() {
    Object.keys(this.replay).forEach((key) => {
      var limit = key.split('_')
      var result = ""
      if(this.score >= limit[0] && this.score <= limit[1]) {
        this.element.append(`<div class="msg_received">${this.replay[key].replay}</div>`)
      }
    })
    $(".chat_replay").html(`
      <div class="text-center"><button class="btn btn-primary mt-4">Submit</button></div>
    `)
  }

}