class Validator {
    
  constructor()
  {
      this.errors = {};
  }

  get(field){

    if (this.errors.errors){
      if (this.errors.errors[field])
      {
        return this.errors.errors[field][0];
      }
    }
    
  }

  store(errors)
  {
    this.errors = errors;
  }

  remove(field)
  {
    delete this.errors.errors[field];
  }
}

export default new Validator();