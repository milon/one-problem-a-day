---
extends: _layouts.post
section: content
title: Top k frequent element
date: 2022-07-12
categories: [array-and-hashmap]
---

Problem URL: [Top k frequent element](https://leetcode.com/problems/top-k-frequent-elements/)

We will count the frequency of each element and store it in a hashmap, where the number itself will be the key and frequency will be the value. Then we sort the elements of the hashmap and get the keys as a list. Then we return first k elements of the list.

```python
class Solution:
    def topKFrequent(self, nums: List[int], k: int) -> List[int]:
        count = {}
        for n in nums:
            count[n] = 1 + count.get(n, 0)
        count = dict(sorted(count.items(), key=lambda item: -item[1]))
        return list(count.keys())[:k]
```

We sort the elements of the hashmap, in worst case that is `O(nlog(n))` time complexity. We also store the frequency of the list, that is `O(n)` space complexity.