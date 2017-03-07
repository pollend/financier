import  axios from 'axios'


export default {
	findBooks: function (response,error) {
		axios.get(OC.generateUrl(FConfig.base_url + '/book'))
			.then(response)
			.catch(error);
	},
	addBook: function (title,description,response,error) {
		axios.put(OC.generateUrl(FConfig.base_url + '/book'),{
				'name' : title,
				'description' : description
			})
			.then(response)
			.catch(error)
	},
	deleteBook: function (id,response, error) {
		axios.delete(OC.generateUrl(FConfig.base_url + '/book/' + id))
			.then(response)
			.catch(error)
	}
}