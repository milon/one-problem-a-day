---
extends: _layouts.post
section: content
title: Split array into consecutive subsequences
problemUrl: https://leetcode.com/problems/split-array-into-consecutive-subsequences/
date: 2022-08-19
categories: [array-and-hashmap]
---

First we will count all the numbers. Then we will create a second hashmap to keep track of subsequences. Then we iterate over the input array, then if there is already a subsequence in place, we add the number to that, or we create a new subsequence. If neither is possible, we directly return false. If we can successfully iterate over all elements, then we return true.

```python
class Solution:
    def isPossible(self, nums: List[int]) -> bool:
        frequency = collections.Counter(nums)
        subsequence = collections.defaultdict(int)
        
        for num in nums:
            if frequency[num] == 0:
                continue
            frequency[num] -= 1
            
            # option 1 - add to an existing subsequence
            if subsequence[num-1] > 0:
                subsequence[num-1] -= 1
                subsequence[num] += 1
            # option 2 - create a new subsequence 
            elif frequency[num+1] and frequency[num+2]:
                frequency[num+1] -= 1
                frequency[num+2] -= 1
                subsequence[num+2] += 1
            else:
                return False
        return True
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`
