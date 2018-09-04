import api from './api'

export default{
	fetchComplaints(){
		return api().get('complaints')
	},
	addComplaint(params){
		return api().post('complaints', params)
	},
	getComplaint(params){
		return api().get('complaints/'+params.id)
	},
	updateComplaint(params){
		return api().put('complaints/'+params.id, params)
	},
	deleteComplaint(params){
		return api().delete('complaints/'+params.id)
	}
}