---
extends: _layouts.post
section: content
title: Most popular video creator
problemUrl: https://leetcode.com/problems/most-popular-video-creator/
date: 2022-12-25
categories: [array-and-hashmap, heap]
---

We will count the number of videos for each creator. Then we will iterate over the videos and count the number of views for each creator. We will update the result.

```python
class Solution:
    def mostPopularCreator(self, creators: List[str], ids: List[str], views: List[int]) -> List[List[str]]:
        popular = collections.defaultdict(int)
        video = collections.defaultdict(list)

        for creator, _id, view in zip(creators, ids, views):
            popular[creator] += view
            video[creator].append((-view, _id))

        res, mostPopular = [], max(popular.values())
        for p in popular:
            if popular[p] == mostPopular:
                heapq.heapify(video[p])
                _, k = heapq.heappop(video[p])
                res.append([p, k])
	    
        return res
```

Time complexity: `O(nlog(n))` <br/>
Space complexity: `O(n)`
