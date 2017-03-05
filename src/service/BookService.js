import axios from 'axios'

export  default {
	GetBooks(callback,errorCallback)
	{
		axios.get(OC.linkTo(FConfig.app,"book"))
			.then((response) => callback(response.status,response.data))
			.catch(errorCallback);
	}
}