---
extends: _layouts.post
section: content
title: Alert using same key card three or more times in a one hour period
problemUrl: https://leetcode.com/problems/alert-using-same-key-card-three-or-more-times-in-a-one-hour-period/
date: 2022-12-06
categories: [array-and-hashmap]
---

We will loop over the `keyName` and `time` and add the time to a list. Then we will sort the list and loop over it. We will keep track of the current key name and the current start point. When we reach a new key name, we will add the current key name and the current start point to the result. Then we will update the current key name and the current start point.

```python
class Solution:
    def alertNames(self, keyName: List[str], keyTime: List[str]) -> List[str]:
        def get_minutes(t: str) -> int:
            hour, minutes = t.split(':')
            return int(hour) * 60 + int(minutes)
        
        def is_alert(times: List[int]) -> bool:
            lent = len(times)
            if lent < 3: 
                return False
            
            l, r = 0, 0
            for r in range(lent):
                if r - l >= 2 and times[r] - times[l] <= 60: 
                    return True
                while l < r and times[r] - times[l] > 60:
                    l += 1
            return False
        
        lookup = collections.defaultdict(list)
        for name, time in zip(keyName, keyTime): 
            lookup[name].append(get_minutes(time))
        
        print(lookup)

        alert_list = [name for name, times in lookup.items() if is_alert(sorted(times))]
        
        return sorted(alert_list)
```

Time complexity: `O(nlog(n))` <br/>
Space complexity: `O(n)`