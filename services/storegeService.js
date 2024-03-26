class StorageService {
  static USER_ACCESS_TOKEN = 'userAccessToken';
  static LOGIN = 'login';
  static USER_ID = 'userId';
  static SELECTED_FILTERS = 'selectedFilters';
  static SELECTED_LEAD_FILTERS = 'selectedLeadFilters';
  static SEARCH_FILTERS = 'searchFilters';
  static LOGGED_IN_USER_DETAILS = 'loggedInUserDetails';
  static ASKED_FOR_PUSH_NOTIFICATIONS = 'askedForPushNotifications';

  getItem(item) {
    let value;
    if (typeof localStorage !== 'undefined' && localStorage.getItem) {
      value = localStorage.getItem(item);
      try {
        if (value && typeof JSON.parse(value) === 'object') {
          return JSON.parse(value);
        } else {
          return value;
        }
      } catch (e) {
        return value;
      }
    } else {
      return null;
    }
  }

  setItem(key, value) {
    if (typeof localStorage !== 'undefined' && localStorage.setItem) {
      if (value && typeof value === 'object') {
        localStorage.setItem(key, JSON.stringify(value));
      } else {
        localStorage.setItem(key, value);
      }
    }
  }

  removeItem(item) {
    if (typeof localStorage !== 'undefined' && localStorage.removeItem) {
      localStorage.removeItem(item);
    }
  }

  removeAll() {
    if (typeof localStorage !== 'undefined' && localStorage.clear) {
      var askedForPushNotifications = this.getItem(
        StorageService.ASKED_FOR_PUSH_NOTIFICATIONS
      );
      localStorage.clear();
      this.setItem(
        StorageService.ASKED_FOR_PUSH_NOTIFICATIONS,
        askedForPushNotifications
      );
    }
  }
}

// Usage:
// var storageService = new StorageService();
// storageService.setItem('key', 'value');
// var itemValue = storageService.getItem('key');
// storageService.removeItem('key');
// storageService.removeAll();



