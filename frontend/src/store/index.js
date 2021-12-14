import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const store = new Vuex.Store({
  state: {
    api: "http://localhost/",
    counts: {
      events: 10,
      messages: 10,
      channels: 10,
    },
    events: {
      page: 1,
      list: [
        { title: 'Event1', content: 'b', date: '01/01/01' },
        { title: 'Event2', content: 'b', date: '01/01/01' },
        { title: 'Event3', content: 'b', date: '01/01/01' },
        { title: 'Event4', content: 'b', date: '01/01/01' },
      ],
    },
    messages: {
      page: 1,
      list: [
        {
          title: 'a',
          content: 'b',
          date: '01/01/01',
          from: 'slack bot',
          to: 'channel',
        },
        {
          title: 'a',
          content: 'b',
          date: '01/01/01',
          from: 'slack bot',
          to: 'channel',
        },
        {
          title: 'a',
          content: 'b',
          date: '01/01/01',
          from: 'slack bot',
          to: 'channel',
        },
        {
          title: 'a',
          content: 'b',
          date: '01/01/01',
          from: 'slack bot',
          to: 'channel',
        },
      ],
    },
    channels: {
      page: 1,
      list: [
        {
          name: '#channel1',
          label: 'active',
          lastmsgdate: '01/01/01',
          nusers: '3',
          active: true,
        },
        {
          name: '#channel2',
          label: 'active',
          lastmsgdate: '01/01/01',
          nusers: '3',
          active: true,
        },
        {
          name: '#channel3',
          label: 'active',
          lastmsgdate: '01/01/01',
          nusers: '3',
          active: true,
        },
        {
          name: '#channel4',
          label: 'semiactive',
          lastmsgdate: '01/01/01',
          nusers: '3',
          active: true,
        },
        {
          name: '#channel5',
          label: 'semiactive',
          lastmsgdate: '01/01/01',
          nusers: '3',
          active: true,
        },
        {
          name: '#channel6',
          label: 'inacgive',
          lastmsgdate: '01/01/01',
          nusers: '3',
          active: false,
        },
        {
          name: '#channel7',
          label: 'inacgive',
          lastmsgdate: '01/01/01',
          nusers: '3',
          active: false,
        },
        {
          name: '#channel8',
          label: 'inacgive',
          lastmsgdate: '01/01/01',
          nusers: '3',
          active: false,
        },
        {
          name: '#channel9',
          label: 'inacgive',
          lastmsgdate: '01/01/01',
          nusers: '3',
          active: false,
        },
      ],
    },
    files: {
      page: 1,
      list: [],
    },
  },
  mutations: {
    increment(state) {
      state.count++
    },
  },
})

export default store
