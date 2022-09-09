---
extends: _layouts.post
section: content
title: Time based key value store
problemUrl: https://leetcode.com/problems/time-based-key-value-store/
date: 2022-07-23
categories: [binary-search, design]
---

We will keep a hashmap as the key value store, key will be used as the key, value will have an array storing all the values and timestamp. When we search for the value, we will look up in the store for the values and binary search through the timestamp to get the value.

```python
class TimeMap:
    def __init__(self):
        self.keyStore = collections.defaultdict(list)

    def set(self, key: str, value: str, timestamp: int) -> None:
        self.keyStore[key].append([value, timestamp])

    def get(self, key: str, timestamp: int) -> str:
        res = ""
        values = self.keyStore.get(key, [])
        l, r = 0, len(values) - 1
        while l <= r:
            m = (l+r) // 2
            if values[m][1] <= timestamp:
                res = values[m][0]
                l = m+1
            else:
                r = m-1
        return res
```

Time Complexity: `O(1)` for set, `O(log(n))` for get
Space Complexity: `O(n)`