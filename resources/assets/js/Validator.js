class Validator {
    
  constructor(){
      this.errors = {};
  }

  store(errors)
  {
    this.errors = errors;
  }
}

export default new Validator();