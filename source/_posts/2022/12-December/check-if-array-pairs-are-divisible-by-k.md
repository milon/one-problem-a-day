---
extends: _layouts.post
section: content
title: Check if array pairs are divisible by k
problemUrl: https://leetcode.com/problems/check-if-array-pairs-are-divisible-by-k/
date: 2022-12-19
categories: [array-and-hashmap]
---

We will use a hashmap to store the frequency of each remainder. Then we will iterate over the hashmap and check if the remainder is divisible by `k`. If it is, then we will check if the frequency of the remainder is even. If it is not, then we will return `False`.

```python
class Solution:
    def canArrange(self, arr: List[int], k: int) -> bool:
        freq = collections.defaultdict(int)
        for a in arr:
            freq[a % k] += 1
        for r in freq:
            if r == 0 or r == k - r:
                if freq[r] % 2 != 0:
                    return False
            elif freq[r] != freq[k - r]:
                return False
        return True
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`