class AppStorage{

	storeToken(token){
		localStorage.setItem('token',token);
	}

	storeUser(user){
		localStorage.setItem('user',user);
	}
	storeUserid(userid){
		localStorage.setItem('userid',userid);
	}

    storerole(role){
		localStorage.setItem('role',role);
	}
    positionrole(position){
		localStorage.setItem('position',position);
	}
    storeunioun(unioun){
		localStorage.setItem('unioun',unioun);
	}

	store(token,user,userid,role,position,unioun){
		this.storeToken(token)
		this.storeUser(user)
		this.storeUserid(userid)
		this.storerole(role)
		this.positionrole(position)
		this.storeunioun(unioun)
	}

	clear(){
		localStorage.removeItem('token')
		localStorage.removeItem('user')
		localStorage.removeItem('userid')
		localStorage.removeItem('role')
		localStorage.removeItem('position')
	}

	getToken(){
		localStorage.getItem(token);
	}

	getUser(){
		localStorage.getItem(user);
	}

}

export default AppStorage = new AppStorage();
