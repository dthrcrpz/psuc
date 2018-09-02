import api from './api'

export default{
	login(params){
		return api().post('login', params)
	}
}