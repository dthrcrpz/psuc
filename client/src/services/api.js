import axios from 'axios'

export default() => {
	return axios.create({
		baseURL: 'http://psuc-api.teryong.com/api'
	})
}