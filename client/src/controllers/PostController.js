import api from './api'

export default{
	fetchPosts(){
		return api().get('posts')
	},
	addPost(params){
		return api().post('posts', params)
	},
	getPost(params){
		return api().get('posts/'+params.id)
	},
	updatePost(params){
		return api().put('posts/'+params.id, params)
	},
	deletePost(params){
		return api().delete('posts/'+params.id)
	}
}